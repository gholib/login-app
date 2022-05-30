import { useTypedSelector } from "hooks/useTypedSelector";
import React from "react";

const UsersList = () => {
  const { users } = useTypedSelector((state) => state.user);

  return (
    <ul>
      <h1 className="text-center title">User List</h1>
      <div className="top-line"></div>
      {users?.map((user, index) => {
        return (
          <li
            className={(index + 1) % 2 === 0 ? "bcg-grey" : "bcg-white"}
            key={user.id}
          >
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
  );
};

export default UsersList;
