import { IRoute } from ".";
import { RouteNames } from "./routeNames";
import Users from "pages/Users";

export const privateRoutes: IRoute[] = [
  {
    path: RouteNames.USERS,
    component: Users,
    exact: true
  }
];
