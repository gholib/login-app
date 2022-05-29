import Logout from "components/Logout";
import Pagination from "components/Pagination";
import UsersList from "components/UsersList";
import { useActions } from "hooks/useActions";
import React, { FC, useEffect } from "react";

const Users: FC = () => {
  const { getUsers } = useActions();
  useEffect(() => {
    getUsers(1);
  }, []);

  return (
    <div className="userlist">
      <UsersList />
      <Pagination />
      <Logout />
    </div>
  );
};
export default Users;
