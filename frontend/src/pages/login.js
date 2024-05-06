import { useState } from "react"
import { Link, useNavigate } from "react-router-dom"
import styled from "styled-components"

const Main = styled.main`
    background-color: #0d6efd;
    border-radius: 10px;
    padding: 10px 20px;
`
    
const Content = styled.div`
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
`

const Form = styled.form`
    display: flex;
    flex-direction: column;
    height: 200px;
    justify-content: space-evenly;
`

const LabelInput = styled.span`
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    
    pointer-events: none;
    transition: .5s;
`

const Input = styled.input`
    background-color: transparent;
    border: none;
    outline: none;
`
    
const ContentInput = styled.label`
    position: relative;
    padding: 15px 20px 10px 20px;
    cursor: text;
    border-radius: 10px;
    
    &:hover ${LabelInput}, &:focus-within ${LabelInput}, & ${Input}:valid + ${LabelInput}{
        top: 5px;
        left: 7px;
        transform: none;
        font-size: 0.8em;
    }
`

export default function Login() {
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const navigate = useNavigate()    

    const urlServer = new URL(window.location.href)
    urlServer.port = 3002
    urlServer.pathname = '/auth/login'

    const handleSubmit = (e) => {
        e.preventDefault()
        fetch(urlServer.href, {
            method: 'POST', 
            headers: {
              'Content-Type': 'application/json' 
            },
            credentials: 'include',
            body: JSON.stringify({email, password}),
        }).then(res => {
            if (res.status === 401) {
                alert('usuário ou senha invalidos')
                throw new Error('Erro: Usuário ou senha invalidos')
            }
            else if (!res.ok) {
                throw new Error('Erro: Impossivel realizar solicitação ao servidor')
            }
            return res.json()   
        }).then(res => {
            console.log(res.message)
            navigate("/dashboard")
        }).catch(error => {
            console.log(error)
        })
    }

    return (
        <Content>
            <Main>
                <Form onSubmit={handleSubmit}>
                    <ContentInput htmlFor='email'>
                        <Input 
                            id="email" 
                            name="email" 
                            type="text" 
                            value={email}
                            onChange={e => setEmail(e.target.value)}
                            required  
                        />
                        <LabelInput>Email: </LabelInput>
                    </ContentInput>
                    <ContentInput htmlFor='password'>
                        <Input 
                            id="password" 
                            name="password" 
                            type="password" 
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            required
                        />
                        <LabelInput>Senha: </LabelInput>
                    </ContentInput>

                    <button type="submit">Entrar</button>
                </Form>
            </Main>

            <Link to={"/register"}>Cadastrar-se</Link>
        </Content>
    )
}