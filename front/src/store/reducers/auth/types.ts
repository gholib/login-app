import { IUser } from "models/auth/IUser";

export interface AuthState {
  isAuth: boolean;
  user: IUser;
  isLoading: boolean;
  error: string;
}

export enum AuthActionEnum {
  SET_AUTH = "SET_AUTH",
  SET_USER = "SET_USER",
  SET_IS_LOADING = "SET_IS_LOADING",
  SET_USERS = "SET_USERS"
}

export interface SetAuthAction {
  type: AuthActionEnum.SET_AUTH;
  payload: boolean;
}
export interface SetUserAction {
  type: AuthActionEnum.SET_USER;
  payload: IUser;
}
export interface SetIsLoadingAction {
  type: AuthActionEnum.SET_IS_LOADING;
  payload: boolean;
}

export type AuthAction = SetAuthAction | SetUserAction | SetIsLoadingAction;
