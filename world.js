document.addEventListener("DOMContentLoaded", function(){

    let btn = document.getElementById("lookup");

    btn.addEventListener("click", function(){

        let btnVal = document.getElementById("country").value;

        let input = "http://localhost/info2180-lab5/world.php?country="+ encodeURIComponent(btnVal);
        console.log(input);
        fetch(input, { mode: 'no-cors' })
            .then(response=>{
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.text();
            })

            .then(data =>{
                document.getElementById("result").innerHTML = data;
            })

            .catch(error => {
                console.error('Fetch error:', error);
            });
    })



})