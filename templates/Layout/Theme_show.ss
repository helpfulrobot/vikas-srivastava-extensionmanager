<!-- ToDo -
Right Now all module/widget/themes are look similar. But they will change later
according to diffrent design and data
-->

<div class="content-container">    

    <div class="content">$Content</div>
    
    <% if ExtensionData %>      
    <ul >
        <% loop ExtensionData %>    

        <h1>$Name</h1>

        <% if $Description %>
        <li>
            Description : $Description
        </li> 
        <% end_if %>

        <% if $Version %>
        <li>
            Version : $Version
        </li>
        <% end_if %>

        <% if $Homepage %>
        <li>
            <a href="$Homepage">Home Page</a>
        </li>
        <% end_if %>

        <% end_loop %>

        <h3><a href="$DownloadLink.DistUrl"> Download Latest Version</a></h3>     

        <% loop ExtensionData %>

      
        <h2>Support </h2>
        <% if $SupportEmail %>
        <li>
            Support Email : $SupportEmail
        </li>
        <% end_if %>

        <% if $SupportIssues %>
        <li>
            <a href="$SupportIssues">Support Issues</a>
        </li>
        <% end_if %>

        <% if $SupportSource %>
        <li>
            <a href="$SupportSource">Support Source</a>
        </li>
        <% end_if %>   

        <% if $SupportForum %>
        <li>
            <a href="$SupportForum">Support Forum</a> 
        </li>
        <% end_if %>

        <% if $SupportWiki %>
        <li>
            <a href="$SupportWiki">Support Wiki</a> 
        </li>
        <% end_if %>

        <% if $SupportIrc %>
        <li>
            Support Irc : $SupportIrc
        </li>
        <% end_if %>

        <% end_loop %>
    </ul>
    <% end_if %>
    <ul>
        <% if $Keywords %>
        <li>
            Keywords : $Keywords
        </li>
        <% end_if %>
        
        <% if $SubmittedBy %>
        <li>
            Submitted By : $SubmittedBy
        </li>
        <% end_if %>               

    <% if $AuthorsDetail %>
    <h2>Authors Detail</h2>
    <% loop AuthorsDetail %>
    <ul>
        <% if $AuthorName %>
        <li>
            Author Name : $AuthorName
        </li>
        <% end_if %>  

        <% if $AuthorEmail %>
        <li>
            Author Email : $AuthorEmail 
        </li>
        <% end_if %>  

        <% if $AuthorHomePage %>
        <li>
            Author HomePage : 
            <a href="$AuthorHomePage "> $AuthorHomePage </a>
            <li>
        <% end_if %>

        <% if $AuthorRole %>
            <li>
                Author Email : $AuthorRole 
            </li>
        <% end_if %>  
    </ul>
    <% end_loop %>        
    <% end_if %>  

    <% if VersionData %>
    <h2>Subversion Detail</h2>
        <% loop VersionData %>
        <p> 
            <h3>$PrettyVersion </h3> 
            <a href="$DistUrl"> Download $DistType</a><br>
            <a href="$SourceUrl"> Source Url</a><br><br> 
        </p>
        <% end_loop %>
    <% end_if %> 
    
 </div>