function validateRegEx(password)
{
    const regex="^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$"
    return(password.match(regex))
}