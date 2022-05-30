import axios from "axios";
import { toast } from "react-toastify";
const notify = (message: string) => {
  toast.error(message, {
    position: "top-center",
    autoClose: 5000,
    hideProgressBar: false,
    closeOnClick: true,
    pauseOnHover: true,
    draggable: true,
    progress: 0
  });
};

const validationErrorHandler = (res: any) => {
  res.meta.errors.forEach((err: any) => {
    notify(err);
  });
};

const http = axios.create({
  withCredentials: true,
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json"
  },
  baseURL: process.env.API_URL ?? "http://localhost:3001"
});

http.interceptors.response.use(
  function (response) {
    return response;
  },
  function (error) {
    if (error.code === "ERR_NETWORK") {
      notify("Connection refused, please check connection and reload page!!");
    }

    if (error.response && error.response.status === 422) {
      validationErrorHandler(error.response.data);
    }
    if (error.response && error.response.status === 404) {
      notify(error.response.data.meta.message);
    }
    if (error.response && error.response.status === 403) {
      notify(error.response.data.message);
    }
    if (error.response && error.response.status === 400) {
      notify(error.response.data.message);
    }
    if (error.response && error.response.status === 500) {
      notify(error.response.data.message);
    }
    if (error.response && error.response.status === 401) {
      window.location.href = "/login";
    }

    return Promise.reject(error);
  }
);
export default http;
