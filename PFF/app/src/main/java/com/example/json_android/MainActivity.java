package com.example.json_android;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    int success=0;
    String message="oo";

    public RecyclerView rv;
    public  ItemAdapter ad;
    ArrayList<Item> ListItems;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Log.d("log: ","debuuuuuut----");

        rv= (RecyclerView) findViewById(R.id.rv_item);

        ListItems=new ArrayList<Item>();

        MainActivity.Dataasync displayItems =new MainActivity.Dataasync();
        displayItems.execute();
        //Création de l'adapter qui utilisera notre liste
        ad=new ItemAdapter(ListItems);

        //On demande au RecycleView d'utiliser notre adapter
        rv.setAdapter(ad);

        //Réglage d'affichage du recyclerView
        rv.setLayoutManager(new LinearLayoutManager(this));


    }





    private class Dataasync extends AsyncTask {




        @Override
        protected Object doInBackground(Object[] params) {
            // Log.i("disp", " start doInBackground");
            ServiceHandler sh = new ServiceHandler();

            // Making a request to url and getting response
            // String jsonStr2 = sh.makeServiceCall("http://192.168.1.6:81/service_web/index2.php", ServiceHandler.GET);
            String jsonStr = sh.makeServiceCall("http://192.168.1.104/PFF/Json.php", ServiceHandler.GET);

            Log.d("Response: ",jsonStr);

            if (jsonStr != null) {
                try {
                    JSONObject jsonObj = new JSONObject(jsonStr);
                    // return value of success
                    success=jsonObj.getInt("success");
                    Log.i("success", String.valueOf(success));
                    if (success==0)
                    {
                        // success=0 ==> there is a string = message
                        message=jsonObj.getString("message");
                        Log.i("message", message);
                    }
                    else if(success==1)
                    {
                        // success=1 ==> there is an array of data = valeurs
                        JSONArray dataValues = jsonObj.getJSONArray("products");
                        // loop each row in the array
                        for(int j=0;j<dataValues.length();j++)
                        {
                            JSONObject values = dataValues.getJSONObject(j);
                            // return values of col1 in valCol1
                            String valCol1= values.getString("Name");
                            // return values of col2 in valCol2
                           // String valCol2= values.getString("description");

                            String valCol3= values.getString("Image");
                            String valCol4= values.getString("Price");


                            //add a string witch contains all of data getted from the response
                            // myListofData.add(valCol1+" - "+valCol2+" - "+valCol3+" - "+valCol4);

                            Item ec=new Item(valCol1,valCol3,Float.parseFloat(valCol4));
                            ListItems.add(ec);
                            Log.i("Row "+(j+1), valCol1+" - ");
                        }
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }
            } else {
                Log.e("ServiceHandler", "Couldn't get any data from the url");
            }

            Log.i("add", " end doInBackground");
            return null;
        }
    }

}
