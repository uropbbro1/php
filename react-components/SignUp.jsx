import React, { useState } from "react";

const SignUp = (props) =>{
    const [userData, setUser] = useState({
        username: '',
        email: '',
        password: ''
    });

    const submitRegistration = (event) => {
        event.preventDefault();
        async function foo(){
            let signUpResult = '';
            await fetch('http://192.168.0.103/diplom/siteScripts/signup.php', {
                method: 'POST',
                headers:{
                    "Access-Control-Allow-Origin": "*",
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(userData)}).then(response => response.json())
                .then(json => json.result).then(result => signUpResult += result);
                console.log(signUpResult);
                
            if(signUpResult !== 'Username is already used' && signUpResult !== 'All fields required!'){
                props.changeSignUpVisibility(props.signUpVisibility);
                props.changeLoginVisibility(props.loginVisibility);
            }
            
            else if(signUpResult === 'Username is already used') alert('имя пользователя занято');
            else alert('заполните все поля');
        }
        foo();
    };

    const goToLogin = () => {
        props.changeSignUpVisibility(props.signUpVisibility);
        props.changeLoginVisibility(props.loginVisibility);
    }

    if(props.signUpVisibility){
        return(
            <div className={props.signUpVisibility ? 'signUpContainer active': 'signUpContainer'} onClick={() => props.changeSignUpVisibility(props.signUpVisibility)}>
                <div className="modal-content" onClick={e => e.stopPropagation()}>
                    <h1>Регистрация</h1>
                    <form onSubmit={submitRegistration}>
                        <input className="centered" type="text" placeholder="Имя пользователя" value={userData.username}
                        name="username" onChange={e => setUser({ ...userData, username: e.target.value })}/>
                        <input className="centered" type="email" placeholder="Email" value={userData.email}
                        name="email" onChange={e => setUser({ ...userData, email: e.target.value })}/>
                        <input className="centered" type="password" placeholder="Пароль" value={userData.password} name="password"
                        onChange={e => setUser({ ...userData, password: e.target.value })}/>
                        <button type="submit">Зарегистрироваться</button>
                        <p>у вас уже есть аккаунт? <button className="logButton" type="button" onClick={goToLogin}><u>Войти</u></button></p>
                    </form> 
                </div>
            </div>
        )
    }else{
        return null;
    }
}

export default SignUp;