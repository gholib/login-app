import { useActions } from "hooks/useActions";
import React from "react";
import { FiLogOut } from "react-icons/fi";
import "styles/logout.scss";

const Logout = () => {
  const { logout } = useActions();
  return (
    <div className="logout">
      <FiLogOut />
      <button onClick={logout}>Log Out</button>
    </div>
  );
};

export default Logout;
