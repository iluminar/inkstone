                    <ul class="list-group">
                        @foreach ($posts as $post)
                            <li class="list-group-item">
                                {!! Markdown::convertToHtml($post->content) !!}
                            </li>
                        @endforeach
                    </ul>
