const fetchAPI = async (url, method, data) => {
    let resp = await fetch(url, {
        method: method,
        body: data
    });
    
    return resp.json();
}