export interface UserState {
  users: Array<any>;
  totalPage: number;
}

export enum UserActionEnum {
  SET_USERS = "SET_USERS",
  SET_TOTAL_PAGE = "SET_TOTAL_PAGE"
}
export interface SetUsersAction {
  type: UserActionEnum.SET_USERS;
  payload: Array<any>;
}
export interface SetTotalPage {
  type: UserActionEnum.SET_TOTAL_PAGE;
  payload: number;
}
export type UserAction = SetUsersAction | SetTotalPage;
