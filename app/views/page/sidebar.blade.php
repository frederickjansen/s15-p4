<div class="span4">
    <h1>Filters</h1>
    <div class="share">
        <ul>
            <li>
                <label class="share-label" for="share-toggle2">My articles</label>
                <div class="toggle toggle-icon">
                    <label class="toggle-radio fui-checkmark-16" for="share-toggle2"></label>
                    <input type="radio" name="share-toggles" id="share-toggle2" value="toggle1">
                    <label class="toggle-radio fui-cross-16" for="share-toggle1"></label>
                    <input type="radio" name="share-toggles" id="share-toggle1" value="toggle2" checked="checked">
                </div>
            </li>
            <li>
                <label class="share-label" for="share-toggle4">Other articles</label>
                <div class="toggle toggle-icon">
                    <label class="toggle-radio fui-checkmark-16" for="share-toggle4"></label>
                    <input type="radio" name="share-toggles2" id="share-toggle4" value="toggle1" checked="checked">
                    <label class="toggle-radio fui-cross-16" for="share-toggle3"></label>
                    <input type="radio" name="share-toggles2" id="share-toggle3" value="toggle2">
                </div>
            </li>
        </ul>
        <a href="#" class="btn btn-primary btn-block btn-large">Update</a>
    </div>

    <h1>Comments</h1>
    <div class="todo">
        <ul>
        @forelse ($latestComments as $comment)
            <li>
                <div class="todo-content">
                    <h4 class="todo-name">
                        <strong>{{ $comment.author }}</strong> - <time datetime="{{ comment.created|date('c') }}">{{ $comment.created }}</time>
                    </h4>
                    <a href="{{ route('article_show', $comment.article.id) }}#comment-{{ $comment.id }}">
                        {{ $comment.comment }}
                    </a>
                </div>
            </li>
        @empty
            <li>
                <div class="todo-content">
                    <h4 class="todo-name">
                        There are no comments.
                    </h4>
                </div>
            </li>
        @endforelse
        </ul>
    </div>
</div>