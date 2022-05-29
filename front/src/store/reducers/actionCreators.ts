import { AuthActionCreators } from "./auth/actionCreators";
import { UserActionCreators } from "./user/actionCreators";

export const allActionCreators = {
  ...AuthActionCreators,
  ...UserActionCreators
};
