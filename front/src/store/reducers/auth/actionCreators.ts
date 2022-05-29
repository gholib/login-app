import {
  AuthActionEnum,
  SetAuthAction,
  SetErrorAction,
  SetIsLoadingAction,
  SetUserAction
} from "./types";
import { IUser } from "models/auth/IUser";
import { AppDispatch } from "../../index";
import http from "widgets/http";

export const AuthActionCreators = {
  setUser: (user: IUser): SetUserAction => ({
    type: AuthActionEnum.SET_USER,
    payload: user
  }),
  setIsAuth: (auth: boolean): SetAuthAction => ({
    type: AuthActionEnum.SET_AUTH,
    payload: auth
  }),
  setIsLoading: (payload: boolean): SetIsLoadingAction => ({
    type: AuthActionEnum.SET_IS_LOADING,
    payload
  }),
  setError: (payload: string): SetErrorAction => ({
    type: AuthActionEnum.SET_ERROR,
    payload
  }),
  login:
    (username: string, password: string, remember: boolean) =>
    async (dispatch: AppDispatch) => {
      const formData = new FormData();
      formData.append("username", username);
      formData.append("password", password);
      formData.append("remember", remember ? "1" : "0");
      try {
        await http.post("/auth", formData);
        dispatch(AuthActionCreators.setIsAuth(true));
      } catch (error) {}
    },
  logout: () => async (dispatch: AppDispatch) => {
    dispatch(AuthActionCreators.setUser({} as IUser));
    dispatch(AuthActionCreators.setIsAuth(false));
  }
};
