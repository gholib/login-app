import AppRouter from "./components/AppRouter";
import React, { FC } from "react";
import "./App.css";
import "react-toastify/dist/ReactToastify.css";
import { ToastContainer } from "react-toastify";
import Loading from "components/Loading";

const App: FC = () => {
  return (
    <div className="main">
      <Loading />
      <ToastContainer
        position="top-center"
        autoClose={5000}
        hideProgressBar={false}
        newestOnTop={false}
        closeOnClick
        rtl={false}
        pauseOnFocusLoss
        draggable
        pauseOnHover
      />
      <AppRouter />
    </div>
  );
};

export default App;
