import { useEffect } from "react"
import { useNavigate } from "react-router-dom"

export default function Dashboard() {
    const navigate = useNavigate()

    const urlServer = new URL(window.location.href)
    urlServer.port = 3002
    urlServer.pathname = '/auth/check'

    useEffect(() => {
        fetch(urlServer.href).then(res => {
            if (!res.ok) {
                throw new Error('erro ao tentar fazer a solicitação')
            }
            return res.json()
        }).then(res => {
            console.log(res.menssage)
        }).catch(error => {
            console.error(error)
            navigate("/login")
        })
    }, [])

    return(
        <main>
            <div>
                parabens, você está logado
            </div>
        </main>
    )
}