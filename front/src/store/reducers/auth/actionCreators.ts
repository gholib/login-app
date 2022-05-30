import {
  AuthActionEnum,
  SetAuthAction,
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
  login:
    (username: string, password: string, remember: boolean) =>
    async (dispatch: AppDispatch) => {
      dispatch(AuthActionCreators.setIsLoading(true));
      const formData = new FormData();
      formData.append("username", username);
      formData.append("password", password);
      formData.append("remember", remember ? "1" : "0");
      try {
        await http.post("/auth", formData);
        dispatch(AuthActionCreators.setIsAuth(true));
      } catch (error) {
      } finally {
        dispatch(AuthActionCreators.setIsLoading(false));
      }
    },
  logout: () => async (dispatch: AppDispatch) => {
    dispatch(AuthActionCreators.setIsLoading(true));
    try {
      await http.delete("/auth");
      dispatch(AuthActionCreators.setIsAuth(false));
    } catch (error) {
    } finally {
      dispatch(AuthActionCreators.setIsLoading(false));
    }
  }
};
