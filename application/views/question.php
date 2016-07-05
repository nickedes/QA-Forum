<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Post Question</h1>
            <div class="account-wall">
                <form class="form-question-post" method="POST" action="question/post_question" id="post_question_form">
                    <div class="form-group">
                        <label for="title">Enter Title</label>
                        <input type="text" class="form-control" placeholder="title" name="title" id="title" >
                        <div id="title_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="description">Enter description</label>
                        <input type="text" class="form-control" placeholder="description" name="description" id="description" >
                        <div id="description_error"></div>
                    </div>
                    <label for="tag">Enter Tags</label>
                    <div class="form-group" id="tags">
                        <input type="text" class="form-control" placeholder="tag" name="tag1" id="tag1" >
                        <div id="tag_error"></div>
                    </div>
                    <button class = "btn btn-sm btn-warning" id="addTag">add</button>
                    &nbsp;<button class="btn btn-lg btn-info" name="submit" type="submit">Post</button>
                    <div id="form_error"></div>
                    <div id="tag_insert"></div>
                    <div id="ques_relation"></div>
                </form>
            </div>
            <br>
            </div>
        </div>
    </div>
