import React from 'react';
import { Link } from 'react-router-dom';


function Homepage() {
  return (
    <div>
      <Link to={"/login"}>login</Link>
      <Link to={"/register"}>Cadastra-se</Link>
      <div>
        bem vindo a pagina de login feito em react
      </div>
    </div>
  );
}

export default Homepage;
