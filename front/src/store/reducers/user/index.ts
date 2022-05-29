import { UserAction, UserActionEnum, UserState } from "./types";

const initialState: UserState = {
  users: [],
  totalPage: 1
};

export default function authReducer(
  state = initialState,
  action: UserAction
): UserState {
  switch (action.type) {
    case UserActionEnum.SET_USERS:
      return { ...state, users: action.payload };
    case UserActionEnum.SET_TOTAL_PAGE:
      return { ...state, totalPage: action.payload };
    default:
      return state;
  }
}
