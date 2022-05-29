import Pagination from "components/Pagination";
import { useActions } from "hooks/useActions";
import { useTypedSelector } from "hooks/useTypedSelector";
import React, { FC, useEffect, useState } from "react";

const Buttons: FC = () => {
  const { getUsers } = useActions();
  const { users, totalPage } = useTypedSelector((state) => state.user);
  const [page, setPage] = useState(1);

  useEffect(() => {
    getUsers(page);
  }, [page]);

  return (
    <div className="userlist">
      <ul>
        <h1 className="title">User List</h1>
        <div className="top-line"></div>
        {users?.map((user) => {
          return (
            <li className="bcg-white" key={user.id}>
              <span className="user-badge">
                <img src="img/icons8-check-circle-48.png" alt="Check Icon" />
              </span>
              <div className="user-item">
                <span className="user-nikname">{user.nik_name}</span>
                <span className="user-name">
                  {user.first_name} {user.last_name}
                </span>
              </div>
              <div className="options">
                <span className="user-options-menu">
                  <span>
                    <img src="img/icons8-menu-vertical-64.png" alt="Menu" />
                  </span>
                </span>
                <span className="user-option">Default group</span>
              </div>
            </li>
          );
        })}
      </ul>
      <Pagination total={totalPage} page={page} onChange={setPage} />
    </div>
  );
};
export default Buttons;
