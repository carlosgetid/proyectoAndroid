package com.cibertec.truykiapp;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

public class LoginActivity extends AppCompatActivity {

    EditText edtUser, edtPass;
    Button btnIngresar;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        edtUser = findViewById(R.id.edtUser);
        edtPass = findViewById(R.id.edtPass);
        btnIngresar = findViewById(R.id.btnIngresar);

        btnIngresar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ValidarUsuario(ObtenerUsuario(),ObtenerPassword());
            }
        });
    }


    public  String ObtenerUsuario(){
        return edtUser.getText().toString();
    }
    public  String ObtenerPassword(){
        return edtPass.getText().toString();
    }

    public  void ValidarUsuario(final String Usuario, String Password){

        //http://192.168.0.12 ---> CAMBIAR POR SU RUTA
        String URL = "http://192.168.0.12:8080/xampp/WebServicePHPVOLLEY/CONTROLADOR/UsuarioControlador.php?op=1&usuario=" + Usuario + "&password=" + Password;
        RequestQueue queue = Volley.newRequestQueue(this);
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    String rspta = String.valueOf(response);
                    if (rspta.contains("success")) {
                        Toast.makeText(LoginActivity.this, "BIENVENIDO ", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(LoginActivity.this, com.cibertec.truykiapp.PrincipalActivity.class);
                        intent.putExtra("usuario", Usuario);
                        startActivity(intent);
                    } else {
                        Toast.makeText(LoginActivity.this, "VERIFIQUE USUARIO Y/O PASSWORD ", Toast.LENGTH_SHORT).show();
                    }
                } catch (Exception ex) {
                    Toast.makeText(LoginActivity.this, "ERROR: " + ex.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(LoginActivity.this,"ERROR EN EL CODIGO ",Toast.LENGTH_SHORT).show();
            }
        });
        queue.add(stringRequest);
    }




}
