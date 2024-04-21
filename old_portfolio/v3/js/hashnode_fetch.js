const GET_USER_ARTICLES = `
    query GetUserArticles($page: Int!) {
        user(username: "padmesh97") {
            publication {
                posts(page: $page) {
                    title
                    brief
                    coverImage
                    contentMarkdown
                    dateAdded
                    slug
                }
            }
        }
    }
`;
const variables={page: 0};

async function gql(query, variables) {
    const data = await fetch('https://api.hashnode.com/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            query,
            variables
        })
    });
    return data.json();
}

$(document ).ready(function() {
    var blogHTML="";
    gql(GET_USER_ARTICLES,variables)
    .then(result =>{
        const articles=result.data.user.publication.posts;
        if(articles.length==0){
            blogHTML+=`<div class="col-12 col-md-8 mt-3">
                <div class="row justify-content-center align-items-center my-5 py-5 article-load-empty-wrapper">
                  <div class="col-12 col-md-2 d-flex justify-content-center mb-4 mb-md-none">
                    <i class="fas fa-pen-fancy article-load-empty-wrapper-icon color-coral"></i>
                  </div>
                  <div class="col-12 col-md-9 color-primary mt-3 mt-md-none">
                    Hang on tight! Something awesome is being created.
                  </div>
                </div>
              </div>`;
        }
        else{
            articles.forEach(post => {
                let dateObj=new Date(post.dateAdded);
                var months=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
                let parsedDateAdded=months[dateObj.getMonth()]+' '+dateObj.getDate()+','+dateObj.getFullYear();

                var readTime;
                $('#contentMarkdown').html(post.contentMarkdown);
                $('#contentMarkdown').readability(function(result){
                  readTime=(Math.ceil(result.time)-2)+" min read"
                });

                blogHTML+=`<div class=\"col-12 col-lg-4 p-3\">
                    <a href=\"${ROOT_URL_BLOG}${post.slug}\" target=\"_blank\" style=\"color:inherit;\">
                      <div class=\"article-card card card-cascade\">
                        <div class=\"view view-cascade overlay\">
                          <img class=\"card-img-top\" src=\"${post.coverImage}\" alt=\"${post.slug}\">
                          <div class=\"mask rgba-white-slight\"></div>
                        </div>

                        <div class=\"card-body card-body-cascade text-center\">
                          <h4 class=\"card-title font-weight-bold \">${post.title}</h4>
                          <div class=\"timestamp\">
                            <div class=\"publised-date color-coral\">${parsedDateAdded}</div>
                            <div class=\"time-read color-coral\">
                              <i class=\"las la-clock color-coral mr-1\"></i>${readTime}
                            </div>
                          </div>
                          <p class=\"card-text\">${post.brief}
                          </p>
                        </div>
                      </div>
                   </a>
                  </div>`;
            });
        }
        $("#blogContainer").html(blogHTML);

    })
    .catch(result =>{
        blogHTML+=`<div class="col-12 col-md-8 mt-3">
                <div class="row justify-content-center align-items-center my-5 py-5 article-load-error-wrapper">
                  <div class="col-12 col-md-2 d-flex justify-content-center align-items-center">
                    <i class="las la-exclamation-triangle article-load-error-wrapper-icon color-primary mb-4 mb-md-none"></i>
                  </div>
                  <div class="col-12 col-md-9 color-primary mt-2 mt-md-none">
                    Could not load articles. Request failed.
                  </div>
                </div>
              </div>`;
        $("#blogContainer").html(blogHTML);
    });

});