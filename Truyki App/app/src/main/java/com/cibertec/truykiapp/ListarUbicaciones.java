package com.cibertec.truykiapp;

import android.os.Bundle;
import android.widget.ListView;

import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;

public class ListarUbicaciones extends AppCompatActivity {

    private ListView lvlUbicaciones;
    private Adaptador adaptador;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.listar_ubicaciones);

        lvlUbicaciones = (ListView) findViewById(R.id.lvlUbicaciones);
        adaptador = new Adaptador(this, getArrayItems());
        lvlUbicaciones.setAdapter(adaptador);
    }

    private ArrayList<Ubicacion> getArrayItems(){
        ArrayList<Ubicacion> listUbicaciones = new ArrayList<>();

        String[] foo = {"Av. Republica de Chile 567","Av. Venezuela 1497","Calle los Cedros 180"};


        for (int i=0; i<foo.length;i++){
            Ubicacion bean = new Ubicacion();
            bean.setDireccion(foo[i]);
            listUbicaciones.add(bean);
        }

        return  listUbicaciones;
    }
}
