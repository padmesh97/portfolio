// const GET_USER_ARTICLES = `
//     query GetUserArticles($page: Int!) {
//         user(username: "padmesh97") {
//             publication {
//                 posts(page: $page) {
//                     title
//                     brief
//                     coverImage
//                     contentMarkdown
//                     dateAdded
//                     slug
//                 }
//             }
//         }
//     }
// `;

// for new hashnode gql api
const GET_USER_ARTICLES = `
      query GetPosts {
        user(username: "padmesh97") {
          posts(page: 1,pageSize: 10){
            nodes{
              title
              brief
              coverImage{
                url
              }
              content{
                markdown
              }
              publishedAt
              slug
            }
          }
        }
      }
`;
const variables={page: 0};

async function gql(query, variables) {
    const data = await fetch('https://gql.hashnode.com/', {
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
        const articles=result.data.user.posts.nodes;
        if(articles.length==0){
            blogHTML+=`<div class="col-12 col-md-8 mt-3">
                <div class="row justify-content-center align-items-center my-5 py-5 article-load-wrapper article-load-status-empty">
                  <div class="col-12 col-md-2 d-flex justify-content-center align-items-center">
                    <i class="las la-star article-load-wrapper-icon mb-4 mb-md-none"></i>
                  </div>
                  <div class="col-12 col-md-9 mt-2 mt-md-none">
                    Hang on tight! Something awesome is being created.
                  </div>
                </div>
              </div>`;

            // older placeholder html in case of empty article found

            // blogHTML+=`<div class="col-12 col-md-8 mt-3">
            //     <div class="row justify-content-center align-items-center my-5 py-5 article-load-empty-wrapper">
            //       <div class="col-12 col-md-2 d-flex justify-content-center mb-4 mb-md-none">
            //         <i class="fas fa-pen-fancy article-load-empty-wrapper-icon color-coral"></i>
            //       </div>
            //       <div class="col-12 col-md-9 color-primary mt-3 mt-md-none">
            //         Hang on tight! Something awesome is being created.
            //       </div>
            //     </div>
            //   </div>`;
        }
        else{
            articles.forEach(post => {
                let dateObj=new Date(post.publishedAt);
                var months=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
                let parsedDateAdded=months[dateObj.getMonth()]+' '+dateObj.getDate()+','+dateObj.getFullYear();

                var readTime;
                $('#contentMarkdown').html((post.content !== null)?post.content.markdown:null);
                $('#contentMarkdown').readability(function(result){
                  readTime=(Math.ceil(result.time)-2)+" min read"
                });
                console.log(post);
                blogHTML+=`
                          <div class="col-12 col-lg-4 p-3">
                            <a href="${ROOT_URL_BLOG}${post.slug}" target="_blank" style="color:inherit;">
                              <div class="article-card card">
                                <img class="card-img-top" src="${(post.coverImage !== null)?post.coverImage.url:'./images/placeholder-image.jpg'}" alt="${post.slug}">

                                <div class="card-body text-center">
                                  <h4 class="card-title font-weight-bold ">${post.title}</h4>
                                  <div class="timestamp">
                                    <div class="publised-date color-coral">${parsedDateAdded}</div>
                                    <div class="time-read color-coral">
                                      <i class="las la-clock color-coral mr-1"></i>${readTime}
                                    </div>
                                  </div>
                                  <p class="card-text">
                                  ${post.brief}
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
      console.log(result);
        blogHTML+=`<div class="col-12 col-md-8 mt-3">
                <div class="row justify-content-center align-items-center my-5 py-5 article-load-wrapper article-load-status-error">
                  <div class="col-12 col-md-2 d-flex justify-content-center align-items-center">
                    <i class="las la-exclamation-triangle article-load-wrapper-icon mb-4 mb-md-none"></i>
                  </div>
                  <div class="col-12 col-md-9 mt-2 mt-md-none">
                    Could not load articles. Request failed.
                  </div>
                </div>
              </div>`;
        $("#blogContainer").html(blogHTML);
    });

});