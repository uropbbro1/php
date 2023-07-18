package com.example.diplom

import android.annotation.SuppressLint
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.os.Looper
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import com.google.android.material.textfield.TextInputLayout
import com.vishnusivadas.advanced_httpurlconnection.PutData

class SignUp : AppCompatActivity() {
    @SuppressLint("MissingInflatedId")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        supportActionBar?.hide()
        setContentView(R.layout.activity_sign_up)
        val usernameInputLayout = findViewById<TextInputLayout>(R.id.userField)
        val emailInputLayout = findViewById<TextInputLayout>(R.id.emailField)
        val passwordInputLayout: TextInputLayout = findViewById(R.id.passField)
        val loginText = findViewById<TextView>(R.id.loginText)
        val signUpButton = findViewById<Button>(R.id.signUpButton)

        loginText.setOnClickListener {
            val intent = Intent(this, Login::class.java)
            startActivity(intent)
            finish()
        }

        signUpButton.setOnClickListener{
            val username = usernameInputLayout.editText?.text.toString()
            val email = emailInputLayout.editText?.text.toString()
            val password = passwordInputLayout.editText?.text.toString()

            if(username != "" && email != "" && password != ""){
                val handler = Handler(Looper.getMainLooper())
                handler.post{
                    val field = arrayOfNulls<String>(3)
                    field[0] = "username"
                    field[1] = "email"
                    field[2] = "password"

                    val data = arrayOfNulls<String>(3)
                    data[0] = username
                    data[1] = email
                    data[2] = password

                    val putData = PutData("http://192.168.0.103/diplom/signup.php", "POST",field, data)
                    if (putData.startPut()) {
                        if (putData.onComplete()) {
                            val result = putData.result
                            if (result.equals("Success")) {
                                val intent = Intent(this, Login::class.java)
                                startActivity(intent)
                                finish()
                            } else {
                                Toast.makeText(this, result, Toast.LENGTH_SHORT).show()
                            }
                        }
                    }
                }
            }
        }
    }
}