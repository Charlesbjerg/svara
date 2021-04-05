<template>
    <div class="content-editor">
        <h3>Respond to this thread</h3>
        <div id="jsContentEditor"></div>
        <div class="chat">
            <ul class="chat__posts">
                <li>
                    <img src="../../assets/img/m_1.jpg" alt="avatar" class="photo">
                    <div class="chat__posts__post__message">
                        <strong>Charles Flores</strong>
                        <a class="chat__posts__post__mailto-user" href="mailto:cflores@example.com">@cflores</a>
                        <span class="chat__posts__post__time">2 hours ago</span>
                        <p class="chat__posts__post__content">
                            Thanks for another <a class="mention" data-mention="#yummy" href="https://example.com/social/yummy">#yummy</a> recipe,
                            <a class="mention" data-mention="@dwilliams" href="mailto:dwilliams@example.com">@dwilliams</a>!
                            Makes me <a class="mention" data-mention="#hungry" href="https://example.com/social/hungry">#hungry</a>
                            just looking at the photos 😋. Definitely adding it to my TODO list for our next
                            <a class="mention" data-mention="#mediterranean" href="https://example.com/social/mediterranean">#mediterranean</a> potluck.
                        </p>
                    </div>
                </li>
                <li>
                    <img src="../../assets/img/w_1.jpg" alt="avatar" class="photo">
                    <div class="chat__posts__post__message">
                        <strong>Mildred Wilson</strong>
                        <a class="chat__posts__post__mailto-user" href="mailto:mwilson@example.com">@mwilson</a>
                        <span class="chat__posts__post__time">4 hours ago</span>
                        <p class="chat__posts__post__content">
                            Really appreciate the <a class="mention" data-mention="#vegetarian" href="https://example.com/social/vegetarian">#vegetarian</a>
                            and <a class="mention" data-mention="#vegan" href="https://example.com/social/vegan">#vegan</a> variations of your recipes.
                            So thoughtful of you! 🌱
                        </p>
                    </div>
                </li>
            </ul>
            <div class="chat__editor">
                <p>
                    I agree with <a href="mailto:mwilson@example.com" class="mention" data-mention="@mwilson">@mwilson</a> 👍.
                    It’s so nice of you to always be providing a few options to try! I love
                    <a href="https://example.com/social/greek" class="mention" data-mention="#greek">#greek</a> cuisine with a modern twist,
                    this one will be perfect to try.
                </p>
            </div>

            <button class="chat-send" type="button">Send</button>
        </div>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
import Underline from '@ckeditor/ckeditor5-basic-styles/src/underline';
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough';
import Mention from '@ckeditor/ckeditor5-mention/src/mention';
import Link from '@ckeditor/ckeditor5-link/src/link';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph';

export default {
    name: "MessageField",
    data() {
        return {
            editor: null,
        };
    },
    mounted() {
        this.$nextTick(() => {
            this.editor = ClassicEditor
                .create( document.querySelector( '.chat__editor' ), {
                    extraPlugins: [ Essentials, Paragraph, Mention, this.MentionLinks, Bold, Italic, Underline, Strikethrough, Link ],
                    toolbar: {
                        items: [
                            'bold', 'italic', 'underline', 'strikethrough', '|', 'link', '|', 'undo', 'redo'
                        ]
                    },
                    mention: {
                        feeds: [
                            {
                                marker: '@',
                                feed: [
                                    { id: '@cflores', avatar: 'm_1', name: 'Charles Flores' },
                                    { id: '@gjackson', avatar: 'm_2', name: 'Gerald Jackson' },
                                    { id: '@wreed', avatar: 'm_3', name: 'Wayne Reed' },
                                    { id: '@lgarcia', avatar: 'm_4', name: 'Louis Garcia' },
                                    { id: '@rwilson', avatar: 'm_5', name: 'Roy Wilson' },
                                    { id: '@mnelson', avatar: 'm_6', name: 'Matthew Nelson' },
                                    { id: '@rwilliams', avatar: 'm_7', name: 'Randy Williams' },
                                    { id: '@ajohnson', avatar: 'm_8', name: 'Albert Johnson' },
                                    { id: '@sroberts', avatar: 'm_9', name: 'Steve Roberts' },
                                    { id: '@kevans', avatar: 'm_10', name: 'Kevin Evans' },
                                    { id: '@mwilson', avatar: 'w_1', name: 'Mildred Wilson' },
                                    { id: '@mnelson', avatar: 'w_2', name: 'Melissa Nelson' },
                                    { id: '@kallen', avatar: 'w_3', name: 'Kathleen Allen' },
                                    { id: '@myoung', avatar: 'w_4', name: 'Mary Young' },
                                    { id: '@arogers', avatar: 'w_5', name: 'Ashley Rogers' },
                                    { id: '@dgriffin', avatar: 'w_6', name: 'Debra Griffin' },
                                    { id: '@dwilliams', avatar: 'w_7', name: 'Denise Williams' },
                                    { id: '@ajames', avatar: 'w_8', name: 'Amy James' },
                                    { id: '@randerson', avatar: 'w_9', name: 'Ruby Anderson' },
                                    { id: '@wlee', avatar: 'w_10', name: 'Wanda Lee' }
                                ],
                                itemRenderer: customItemRenderer
                            },
                        ]
                    }
                } )
                .then( editor => {
                    const editingView = editor.editing.view;
                    const rootElement = editingView.document.getRoot();

                    window.editor = editor;

                    // Clone the first message in the chat when "Send" is clicked, fill it with new data
                    // and append to the chat list.
                    document.querySelector( '.chat-send' ).addEventListener( 'click', () => {
                        const message = editor.getData();

                        if ( !message ) {
                            editingView.change( writer => {
                                writer.addClass( 'highlighted', rootElement );
                                editingView.focus();
                            } );

                            setTimeout( () => {
                                editingView.change( writer => {
                                    writer.removeClass( 'highlighted', rootElement );
                                } );
                            }, 650 );

                            return;
                        }

                        const clone = document.querySelector( '.chat__posts li' ).cloneNode( true );

                        clone.classList.add( 'new-post' );
                        clone.querySelector( 'img' ).src = '../../assets/img/m_0.jpg';
                        clone.querySelector( 'strong' ).textContent = 'CKEditor User';

                        const mailtoUser = clone.querySelector( '.chat__posts__post__mailto-user' );

                        mailtoUser.textContent = '@ckeditor';
                        mailtoUser.href = 'mailto:info@cksource.com';

                        clone.querySelector( '.chat__posts__post__time' ).textContent = 'just now';
                        clone.querySelector( '.chat__posts__post__content' ).innerHTML = message;

                        document.querySelector( '.chat__posts' ).appendChild( clone );

                        editor.setData( '' );
                        editingView.focus();
                    } );
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
        });
    },
    methods: {
        MentionLinks( editor ) {
            // The upcast converter will convert a view
            //
            //		<a href="..." class="mention" data-mention="...">...</a>
            //
            // element to the model "mention" text attribute.
            editor.conversion.for( 'upcast' ).elementToAttribute( {
                view: {
                    name: 'a',
                    key: 'data-mention',
                    classes: 'mention',
                    attributes: {
                        href: true
                    }
                },
                model: {
                    key: 'mention',
                    value: viewItem => editor.plugins.get( 'Mention' ).toMentionAttribute( viewItem )
                },
                converterPriority: 'high'
            } );

            // Downcast the model "mention" text attribute to a view
            //
            //		<a href="..." class="mention" data-mention="...">...</a>
            //
            // element.
            editor.conversion.for( 'downcast' ).attributeToElement( {
                model: 'mention',
                view: ( modelAttributeValue, { writer } ) => {
                    // Do not convert empty attributes (lack of value means no mention).
                    if ( !modelAttributeValue ) {
                        return;
                    }

                    let href;

                    // User mentions are downcasted as mailto: links. Tags become normal URLs.
                    if ( modelAttributeValue.id[ 0 ] === '@' ) {
                        href = `mailto:${ modelAttributeValue.id.slice( 1 ) }@example.com`;
                    } else {
                        href = `https://example.com/social/${ modelAttributeValue.id.slice( 1 ) }`;
                    }

                    return writer.createAttributeElement( 'a', {
                        class: 'mention',
                        'data-mention': modelAttributeValue.id,
                        href
                    }, {
                        // Make mention attribute to be wrapped by other attribute elements.
                        priority: 20,
                        // Prevent merging mentions together.
                        id: modelAttributeValue.uid
                    } );
                },
                converterPriority: 'high'
            } );
        },
        customItemRenderer( item ) {
            const itemElement = document.createElement( 'span' );
            const avatar = document.createElement( 'img' );
            const userNameElement = document.createElement( 'span' );
            const fullNameElement = document.createElement( 'span' );

            itemElement.classList.add( 'mention__item' );

            avatar.src = `../../assets/img/${ item.avatar }.jpg`;

            userNameElement.classList.add( 'mention__item__user-name' );
            userNameElement.textContent = item.id;

            fullNameElement.classList.add( 'mention__item__full-name' );
            fullNameElement.textContent = item.name;

            itemElement.appendChild( avatar );
            itemElement.appendChild( userNameElement );
            itemElement.appendChild( fullNameElement );

            return itemElement;
        },
    }
}
</script>

<style scoped>

</style>
