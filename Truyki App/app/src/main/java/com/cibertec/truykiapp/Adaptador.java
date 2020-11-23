package com.cibertec.truykiapp;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.ArrayList;

public class Adaptador extends BaseAdapter {
    private Context context;
    private ArrayList<Ubicacion> listUbicaciones;

    public Adaptador(Context context, ArrayList<Ubicacion> listUbicaciones) {
        this.context = context;
        this.listUbicaciones = listUbicaciones;
    }


    @Override
    public int getCount() {
        return listUbicaciones.size();
    }

    @Override
    public Object getItem(int position) {
        return listUbicaciones.get(position);
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        Ubicacion bean = (Ubicacion) getItem(position);

        convertView = LayoutInflater.from(context).inflate(R.layout.ubicacion, null);
        TextView lblUbicacion = (TextView)convertView.findViewById(R.id.lblUbicacion);

        lblUbicacion.setText(bean.getDireccion());

        return convertView;
    }
}
