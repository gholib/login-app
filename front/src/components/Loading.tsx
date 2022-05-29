import { useTypedSelector } from "hooks/useTypedSelector";
import React from "react";
import "styles/loading.scss";

const Loading = () => {
  const { isLoading } = useTypedSelector((state) => state.auth);
  return (
    <>
      {isLoading ? (
        <div className="loading">
          <div className="balls">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      ) : (
        ""
      )}
    </>
  );
};

export default Loading;
