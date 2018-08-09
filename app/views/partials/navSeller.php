<nav>

    <ul>
        <li><a href="/dashboard">Dashboards</a></li>
        <li><a href="/company">Firmy</a></li>
        <li><a href="/contacts">Kontakty</a></li>
        <li><a href="/questions">Pytania</a></li>
        <li><a href="/photos">Zdjęcia</a></li>
        <li><a href="/clientsCategories">Kategorie Klientów</a></li>
        <form method="get" action="/editSeller">
            <input type="text" hidden name="id" <?= "value=" . apc_fetch(session_id())['id']?>>
            <button formmethod="get" type="submit">Edit Profile</button>
        </form>
    </ul>
    <form method="post" action="/logout">
        <button formmethod="post" type="submit">logout</button>
    </form>
</nav>