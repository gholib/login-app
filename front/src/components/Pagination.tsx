import { useActions } from "hooks/useActions";
import { useTypedSelector } from "hooks/useTypedSelector";
import React, { useState } from "react";

const Pagination = () => {
  const { totalPage } = useTypedSelector((state) => state.user);
  const { getUsers } = useActions();
  const [page, setPage] = useState(1);

  const onChangePage = (p: number) => {
    getUsers(p);
    setPage(p);
  };
  const change = (i: any) => {
    onChangePage(Number(i));
  };
  const getItems = () => {
    if (totalPage > 1) {
      const items = [];
      for (let i = 1; i <= totalPage; i++) {
        items.push(
          <span key={i} onClick={() => change(i)}>
            <span
              className={(page === i ? "pagination-active " : "") + "underline"}
            >
              {i}
            </span>
          </span>
        );
      }
      return (
        <div className="pagination">
          {items}
          <span
            onClick={page !== totalPage ? () => change(page + 1) : () => {}}
          >
            <span
              className={
                page !== totalPage ? "underline" : "pagination-disabled"
              }
            >
              Next{" "}
              <img
                className="next-icon"
                src="img/icons8-next-page-48.png"
                alt="Next Icon"
              />
            </span>
          </span>
        </div>
      );
    }
    return <></>;
  };
  return <div>{getItems()}</div>;
};

export default Pagination;
