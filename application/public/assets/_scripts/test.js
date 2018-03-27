let basedataset = {}
let ajaxbase = {};
//setting api Urls
apiinterface();

function apiinterface() {
    ajaxbase.createuser = '/read/page/:uid'
}
//setting up payload for post method
basedataset.uid = 'route-001';
basedataset.username = profile.getGivenName();
//setting up url for api
ajaxbase.url = ajaxbase.createuser
ajaxbase.payload = basedataset;

//reusable promise based approach
basepostmethod(ajaxbase).then(function(data) {
    console.log('common data', data);
}).catch(function(reason) {
    console.log('reason for rejection', reason)
});

//modular ajax (Post/GET) snippets
function basepostmethod(ajaxbase) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: ajaxbase.url,
            method: 'post',
            dataType: 'json',
            data: ajaxbase.payload,
            success: function(data) {
                resolve(data);
            },
            error: function(xhr) {
                reject(xhr)
            }

        });
    });
}