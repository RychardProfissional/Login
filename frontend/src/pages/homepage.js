import React from 'react';
import { Link } from 'react-router-dom';
import styled from 'styled-components';

const Main = styled.main`
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: #f8f9fa; /* Cinza claro */
  height: 100vh;
`;

const Header = styled.header`
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  background-color: #0d6efd; /* Azul */
  width: 100%;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Sombreamento */
`;

const HeaderTitle = styled.h1`
  font-size: 2em;
  color: #ffffff; /* Branco */
`;

const HeaderLinks = styled.div`
  display: flex;
  align-items: center;
`;

const HeaderLink = styled(Link)`
  text-decoration: none;
  margin-left: 20px;
  padding: 10px 20px;
  font-size: 1.2em;
  font-family: 'Arial', sans-serif;
  font-weight: bold;
  color: #ffffff; /* Branco */
  background-color: #0d6efd; /* Azul */
  border-radius: 8px;
  transition: background-color 0.3s ease;

  &:hover {
    background-color: #0a58ca; /* Azul mais escuro */
  }
`;

const Section = styled.section`
  margin-top: 30px;
  background-color: #ffffff; /* Branco */
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1); /* Sombreamento */
`;

const SectionTitle = styled.h3`
  color: #0d6efd;
  font-size: 1.5em;
  margin-bottom: 10px;
`;

const Dependencies = styled.div`
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  max-width: 620px;
`;

const DependencyBadge = styled.img`
  margin: 10px;
`;

const Text = styled.div`
  color: #0d6efd;
  font-size: 1.5em;
`

function FrontendDependencies() {
  return (
    <Section>
      <SectionTitle>Dependências do Frontend</SectionTitle>
      <Dependencies>
        <DependencyBadge src="https://img.shields.io/badge/-Jest-orange?logo=jest" alt="Jest"/>
        <DependencyBadge src="https://img.shields.io/badge/-Testing%20Library-blue?logo=testing-library" alt="Testing Library"/>
        <DependencyBadge src="https://img.shields.io/badge/-User%20Event-green?logo=testing-library" alt="User Event"/>
        <DependencyBadge src="https://img.shields.io/badge/-React-blue?logo=react" alt="React"/>
        <DependencyBadge src="https://img.shields.io/badge/-React%20Dom-yellow?logo=react" alt="React Dom"/>
        <DependencyBadge src="https://img.shields.io/badge/-React%20Router%20Dom-purple?logo=react-router" alt="React Router Dom"/>
        <DependencyBadge src="https://img.shields.io/badge/-React%20Scripts-blue?logo=react" alt="React Scripts"/>
        <DependencyBadge src="https://img.shields.io/badge/-Web%20Vitals-red?logo=web" alt="Web Vitals"/>
      </Dependencies>
    </Section>
  );
}

function BackendDependencies() {
  return (
    <Section>
      <SectionTitle>Dependências do Backend</SectionTitle>
      <Dependencies>
      <DependencyBadge src="https://img.shields.io/badge/-Cors-lightgrey?logo=cors" alt="Cors"/>
        <DependencyBadge src="https://img.shields.io/badge/-Dotenv-green?logo=dotenv" alt="Dotenv"/>
        <DependencyBadge src="https://img.shields.io/badge/-Express-blue?logo=express" alt="Express"/>
        <DependencyBadge src="https://img.shields.io/badge/-Express%20MySQL%20Session-lightblue?logo=mysql" alt="Express MySQL Session"/>
        <DependencyBadge src="https://img.shields.io/badge/-Express%20Session-lightblue?logo=express-session" alt="Express Session"/>
        <DependencyBadge src="https://img.shields.io/badge/-MySQL-blue?logo=mysql" alt="MySQL"/>
      </Dependencies>
    </Section>
  );
}

function Homepage() {
  return (
    <>
      <Header>
        <HeaderTitle>Login</HeaderTitle>
        <HeaderLinks>
          <HeaderLink to={"/login"}>Entrar</HeaderLink>
          <HeaderLink to={"/register"}>Cadastrar</HeaderLink>
        </HeaderLinks>
      </Header>
      <Main>
        <Text>Este site é feito com <strong>React</strong> no Frontend e <strong>Nodejs</strong> no Backend, utilizando o conceito de microserviços</Text>
        <BackendDependencies />
        <FrontendDependencies />
      </Main>
    </>
  );
}

export default Homepage;
