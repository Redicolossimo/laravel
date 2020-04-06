let delButtons = document.querySelectorAll('.delete');
let admButtons = document.querySelectorAll('.admin');
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


delButtons.forEach((elem) => {
    elem.addEventListener('click', () => {
        console.log('sending....');
        let id = elem.getAttribute('data-id');
        (async () => {
            const response = await fetch(`/api/user/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-type': 'application/json'
                },
                method: 'delete',
                body: JSON.stringify({
                    id
                })
            });
            const answer = await response.json();
            document.getElementById(`user${answer.id}`).remove();
            document.getElementById(`alert`).innerHTML = `
                    <div class="container">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${answer.message}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    `;
            console.log(answer);
        })();
    })
});

admButtons.forEach((elem) => {
    elem.addEventListener('click', () => {
        console.log('sending....');
        let id = elem.getAttribute('data-id');
        (async () => {
            const response = await fetch(`/api/user/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-type': 'application/json'
                },
                method: 'patch',
                body: JSON.stringify({
                    id
                })
            });
            const answer = await response.json();
            console.log(answer.id);
            console.log(answer.is_admin);
            if(answer.is_admin){
                document.getElementById(`admButton${answer.id}`).innerText = 'From admin' ;
            } else{
                document.getElementById(`admButton${answer.id}`).innerText = 'To admin';
            }
            document.getElementById(`alert`).innerHTML = `
                    <div class="container">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${answer.message}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    `;

        })();
    })
});
