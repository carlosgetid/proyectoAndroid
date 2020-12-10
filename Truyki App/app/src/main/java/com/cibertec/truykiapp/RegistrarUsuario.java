package com.cibertec.truykiapp;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class RegistrarUsuario extends AppCompatActivity {

    EditText txtNombres, txtApellidos, txtEmail, txtContrasena, txtReContrasena, txtCelular;
    Button btnRegistrar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registrar_usuario);

        txtNombres = (EditText) findViewById(R.id.txtNombres);
        txtApellidos = (EditText) findViewById(R.id.txtApellidos);
        txtEmail = (EditText) findViewById(R.id.txtEmail);
        txtContrasena = (EditText) findViewById(R.id.txtContrasena);
        txtReContrasena = (EditText) findViewById(R.id.txtReContrasena);
        txtCelular = (EditText) findViewById(R.id.txtCelular);

        btnRegistrar = (Button) findViewById(R.id.btnIngresar);

        btnRegistrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                registrarUsuario(ObtenerUsuario(), ObtenerPassword(), "1");
            }
        });
    }

    public  String ObtenerUsuario(){
        return txtEmail.getText().toString();
    }
    public  String ObtenerPassword(){
        return txtContrasena.getText().toString();
    }

    public  void registrarUsuario(final String user, final String pass, final String activo){

        //http://192.168.0.12 ---> CAMBIAR POR SU RUTA
        String url = "http://192.168.1.5/WebServicePHPVOLLEY/CONTROLADOR/UsuarioControlador.php?op=2&usuario="+ user +"&password="+ pass +"&activo="+ activo;
        RequestQueue queue = Volley.newRequestQueue(this);
        StringRequest postRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>()
                {
                    @Override
                    public void onResponse(String response) {
                    }
                },
                new Response.ErrorListener()
                {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                    }
                }
        ) {
            @Override
            protected Map<String, String> getParams()
            {
                Map<String, String>  params = new HashMap<String, String>();
                params.put("usuario", user);
                params.put("password", pass);
                params.put("activo", activo);

                return params;
            }
        };
        queue.add(postRequest);
    }
}