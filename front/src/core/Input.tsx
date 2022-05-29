import { InputProps } from "models/InputProps";
import React, { FC } from "react";

const Input: FC<InputProps> = ({
  className,
  type,
  onChange,
  placeholder,
  label,
  id
}) => {
  return (
    <div>
      {label ? <label htmlFor={id}>{label}</label> : ""}
      <input
        id={id}
        className={className}
        type={type}
        placeholder={placeholder}
      />
    </div>
  );
};

export default Input;
