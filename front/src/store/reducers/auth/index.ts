import { AuthAction, AuthActionEnum, AuthState } from "./types";
import { IUser } from "models/auth/IUser";
const accessToken = document.cookie.replace(
  /(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/,
  "$1"
);
const refreshToken = document.cookie.replace(
  /(?:(?:^|.*;\s*)refresh_token\s*\=\s*([^;]*).*$)|^.*$/,
  "$1"
);
console.log("toekn", accessToken, refreshToken);

const initialState: AuthState = {
  isAuth: Boolean(accessToken || refreshToken),
  error: "",
  isLoading: false,
  user: {} as IUser
};

export default function authReducer(
  state = initialState,
  action: AuthAction
): AuthState {
  switch (action.type) {
    case AuthActionEnum.SET_AUTH:
      return { ...state, isAuth: action.payload, isLoading: false };
    case AuthActionEnum.SET_USER:
      return { ...state, user: action.payload };
    case AuthActionEnum.SET_ERROR:
      return { ...state, error: action.payload, isLoading: false };
    case AuthActionEnum.SET_IS_LOADING:
      return { ...state, isLoading: action.payload };
    default:
      return state;
  }
}
