import React, { useState } from "react";

const Authorization = (props) =>{

    const [userInput, setUserInput] = useState({
        username: '',
        password: '',
    })

    const handleVisibilityChange = () =>{
        props.changeSignUpVisibility(props.signUpVisibility);
        props.changeLoginVisibility(props.loginVisibility);
    }

    const submitLogin = (event) => {
        event.preventDefault();
        async function foo(){
            let loginResult = {};
            await fetch('http://192.168.0.103/diplom/siteScripts/login.php', {
                method: 'POST',
                headers:{
                    "Access-Control-Allow-Origin": "*",
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(userInput)}).then(response => response.json())
                .then(json => loginResult = {result: json.result, id: json.id, username: json.username, type: json.type});
                console.log(loginResult);
                
            if(loginResult.result !== "Wrong Password or Username" && loginResult.result !== "All fields required!"){
                localStorage.setItem("userId", loginResult.id);
                localStorage.setItem("username", loginResult.username);
                localStorage.setItem("type", loginResult.type);
                props.GetLoggedUserInfo(loginResult.id, loginResult.username);
                props.changeLoginVisibility(props.loginVisibility);
                props.changeChooseRoleVisibility(props.chooseRoleVisibility);
            }
            else if(loginResult.result === 'Wrong Password or Username') alert('Неправильное имя пользователя или пароль');
            else alert('Заполните все поля');
        }
        foo();
    };

    if(props.loginVisibility){
        return(
            <div className={props.loginVisibility ? 'loginContainer active': 'loginContainer'} onClick={() => props.changeLoginVisibility(props.loginVisibility)}>
                <div className="modal-login-content" onClick={e => e.stopPropagation()}>
                    <h1>Вход</h1>
                    <form onSubmit={submitLogin}>
                        <input className="centered" type="text" placeholder="Имя пользователя" name="username"
                        onChange={e => setUserInput({ ...userInput, username: e.target.value })}/>
                        <input className="centered" type="password" placeholder="Пароль" name="password"
                        onChange={e => setUserInput({ ...userInput, password: e.target.value })}/>
                        <button type="submit">Войти</button>
                        <p>у вас ещё нет аккаунта? <button className="logButton" type="button" onClick={handleVisibilityChange}><u>Зарегистрироваться</u></button></p>
                    </form>
                </div>
            </div>
        )
    }else return null;
}

export default Authorization;