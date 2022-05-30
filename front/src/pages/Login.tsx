import { useActions } from "hooks/useActions";
import React, { FC, useState } from "react";
import "styles/login.scss";

const Login: FC = () => {
  const { login } = useActions();
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [remember, setRemember] = useState(false);
  const submit = () => {
    login(username, password, remember);
  };
  return (
    <section className="login-form">
      <div>
        <div className="login-content">
          <img className="logo" src="img/Logo.svg" alt="Logo" />
          <div>
            <h1 className="title">Welcome to the Learning Management System</h1>
            <h3 className="subtitle">Please log in to continue</h3>
          </div>
          <div className="username-input">
            <input
              className="input username"
              type="username"
              placeholder="Username"
              value={username}
              onChange={(e) => setUsername(e.target.value)}
            />
          </div>
          <div className="password-input">
            <input
              className="input password"
              type="password"
              placeholder="Password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
            />
          </div>
          <div className="recovery">
            <div className="remember">
              <input
                type="checkbox"
                id="check"
                checked={remember}
                onChange={(e) => setRemember(e.target.checked)}
              />
              <label htmlFor="check">Remember me</label>
            </div>
          </div>
          <button onClick={submit} className="btn btn-primary">
            Log in
          </button>
        </div>
      </div>
    </section>
  );
};

export default Login;
