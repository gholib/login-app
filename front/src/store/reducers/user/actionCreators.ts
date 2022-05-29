import { SetTotalPage, SetUsersAction, UserActionEnum } from "./types";
import { IStudent } from "models/auth/IStudent";
import { AppDispatch } from "../../index";
import http from "widgets/http";
import { AuthActionCreators } from "../auth/actionCreators";

export const UserActionCreators = {
  setUsers: (users: Array<any>): SetUsersAction => ({
    type: UserActionEnum.SET_USERS,
    payload: users
  }),
  setTotalPage: (total: number): SetTotalPage => ({
    type: UserActionEnum.SET_TOTAL_PAGE,
    payload: total
  }),
  getUsers: (page: number) => async (dispatch: AppDispatch) => {
    try {
      dispatch(AuthActionCreators.setIsLoading(true));
      const res = await http.get("/users?page=" + page);
      const users = [] as Array<any>;
      res.data.response.data.forEach((student: any) => {
        users.push({
          id: student.id,
          nik_name: student.nik_name,
          first_name: student.first_name,
          last_name: student.last_name,
          created_at: student.created_at,
          updated_at: student.updated_at
        });
      });
      const total = Number(res.data.response.last_page);
      dispatch(UserActionCreators.setUsers(users));
      dispatch(UserActionCreators.setTotalPage(total));
    } catch (error) {
    } finally {
      dispatch(AuthActionCreators.setIsLoading(false));
    }
  }
};
