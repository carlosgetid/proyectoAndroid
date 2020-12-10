package com.cibertec.truykiapp;

import android.app.Activity;
import android.os.Bundle;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;

import java.util.ArrayList;
import java.util.HashMap;

public class ListCategoriaActivity extends Activity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.listview_categoria1);

        CargarListView();
    }

    public void CargarListView(){
        final ArrayList<HashMap<String,String>> listaCategoria = new ArrayList<>();

        String URL = "http://192.168.1.3:1080/xampp/WebServicePHPVOLLEY/CONTROLADOR/CategoriaControlador.php?op=2";

        RequestQueue queue = Volley.newRequestQueue(this);
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONArray jsonArray = new JSONArray(response);
                    for (int i = 0; i < jsonArray.length(); i++) {

                        HashMap<String,String> categoria = new HashMap<>();
                        categoria.put("codigo",jsonArray.getJSONObject(i).getString("Id"));
                        categoria.put("imagen",jsonArray.getJSONObject(i).getString("Img"));
                        categoria.put("nombre",jsonArray.getJSONObject(i).getString("Nombre"));
                        listaCategoria.add(categoria);
                    }
                    if(listaCategoria.size()>0){
                        ListView lv = findViewById(R.id.LSTV);
                        ListAdapter adapter = new SimpleAdapter(ListCategoriaActivity.this,listaCategoria,R.layout.categoria1,
                                new String[]{"codigo","imagen","nombre"},
                                new int[]{R.id.gd,R.id.favImageView,R.id.catextProducto});
                        lv.setAdapter(adapter);
                    }else{
                        Toast.makeText(ListCategoriaActivity.this,"NO SE OBTUVO RESULTADOS",Toast.LENGTH_SHORT).show();
                    }
                } catch (Exception ex) {
                    Toast.makeText(ListCategoriaActivity.this, "ERROR: " + ex.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(ListCategoriaActivity.this,"ERROR DE CODIGO",Toast.LENGTH_SHORT).show();
            }
        });
        queue.add(stringRequest);
    }
}
