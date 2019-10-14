
<table class="table table-bordered">    
                            <tbody>
                                <tr>
                                    <td>Name</td><td><strong>{{ $names->name }}</strong> @if($names->arabic) <span class="float-right">{{ $names->arabic }}</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>Gender</td><td>{{ $names->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Meaning</td><td>{{ strip_tags($names->meaning) }}</td>
                                </tr>
                                <tr>
                                    <td>Rating</td><td><div class="row lead evaluation">
                                    <div id="" class="starrr" data-rating='{{ @$names->ratings->average }}' data-id="{{ $names->id }}"></div>
                                    <div>{{ @$names->ratings->total_votes }}</div>                                        
                                </div></td>
                            </tr>
                            <tr>
                                <td>Add to favorites</td>
                                <td><div id="fav">
                                    @if (( Session::get('favorites')) && ($key = array_search($name->id, Session::get('favorites'))) !==
                                    false)
                                    <span class="text-warning" title="Shortlisted"><i class="fas fa-star"></i></span>
                                    @else
                                    <span title="Add to Favorites" id="{{ $name->id }}" class="{{ Auth::check() ? "myfav" : "fav" }}"><i
                                            class="far fa-star"></i></span>
                                    @endif
                                </div>
                                </td>
                            </tr>
                            <tr><td colspan="2"><a href="http://www.names4muslims.com/name/{{ $names->slug }}.html" class="btn btn-success">More details</a></td></tr>
                        </tbody>
</table>
