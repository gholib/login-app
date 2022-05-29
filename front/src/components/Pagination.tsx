import React from "react";

const Pagination = (props: any) => {
  const change = (i: any) => {
    props.onChange(Number(i));
  };
  const getItems = () => {
    if (props.total > 1) {
      const items = [];
      for (let i = 1; i <= props.total; i++) {
        items.push(
          <span key={i} onClick={() => change(i)}>
            <span
              className={
                (props.page === i ? "pagination-active " : "") + "underline"
              }
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
            onClick={
              props.page !== props.total
                ? () => change(props.page + 1)
                : () => {}
            }
          >
            <span
              className={
                props.page !== props.total ? "underline" : "pagination-disabled"
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
