package com.example.json_android;


import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

//import com.squareup.picasso.Picasso;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;



public class ItemAdapter extends RecyclerView.Adapter<ItemAdapter.Vholer> {

    private ArrayList<Item> Listitems;

    public ItemAdapter(ArrayList<Item> listitems) {
       this.Listitems = listitems;
    }

    @Override
    public Vholer onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.ligne_item, parent, false);


        return new Vholer(view);
    }

    @Override
    public void onBindViewHolder(Vholer holder, int position) {
        final Item itemi = Listitems.get(position);
        holder.item_pr.setText(String.valueOf(itemi.getPrice()));
        holder.item_nm.setText(itemi.getName());

        Picasso.get().load("http://192.168.1.104/PFF/images/"+itemi.getImage()).into(holder.img);

    }

    @Override
    public int getItemCount() {
        return Listitems.size();
    }

    // class interne vHoler

    public class Vholer extends RecyclerView.ViewHolder {

        public TextView item_pr ;
        public ImageView img;
        public View root;
        public TextView item_nm;



        public Vholer(View itemView) {
            super(itemView);

            item_pr= (TextView) itemView.findViewById(R.id.pr_item);

            img =(ImageView)itemView.findViewById(R.id.im_item);

            root = itemView.findViewById(R.id.root);
            item_nm = (TextView) itemView.findViewById(R.id.nm_item);
        }
    }

}
