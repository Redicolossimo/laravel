let buttons = document.querySelectorAll('.altDelete');
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
buttons.forEach((elem) => {
    elem.addEventListener('click', () => {
        console.log('sending....');
        let id = elem.getAttribute('data-id');
        (async () => {
            const response = await fetch(`/api/news/${id}`, {
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
            document.getElementById(`news${answer.id}`).remove();
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
