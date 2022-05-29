import { IRoute } from ".";
import { RouteNames } from "./routeNames";
import Users from "pages/Users";
import Home from "pages/Home";

export const privateRoutes: IRoute[] = [
  {
    path: RouteNames.USERS,
    component: Users,
    exact: true
  },
  {
    path: RouteNames.HOME,
    component: Home,
    exact: true
  }
];
