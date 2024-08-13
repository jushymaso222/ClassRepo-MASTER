<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="EBookSearch.aspx.cs" Inherits="SE256_MasterPages.Backend.EBookSearch" %>



<asp:Content ID="Content1" ContentPlaceHolderID="BreakingNewsContent" runat="server">
    <h2>EBook Search Page</h2>
</asp:Content>



<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">

    <p>
        Book Title: <asp:TextBox ID="txtTitle" runat="server" Columns="30" />

        &nbsp; &nbsp; &nbsp; &nbsp;

        Author's Last Name: <asp:TextBox ID="txtAuthorLast" runat="server" Columns="30" /> 
    </p>

    <br />

    <asp:Button ID="btnSearch" runat="server" Text="Search EBooks" OnClick="btnSearch_Click" />

    <br />

    <br />

    <asp:DataGrid ID="dgResults" runat="server" AutoGenerateColumns="false" >
        <Columns>
            <asp:BoundColumn DataField="Title" HeaderText="Book Title" />
            <asp:BoundColumn DataField="AuthorFirst" HeaderText="Author's First Name" />
            <asp:BoundColumn DataField="AuthorLast" HeaderText="Author's Last Name" />
            <asp:BoundColumn DataField="DatePublished" HeaderText="Date Published" />

            <asp:HyperLinkColumn Text="Edit" DataNavigateUrlFormatString="~/Backend/EbookMgr.aspx?EBook_ID={0}" DataNavigateUrlField="EBook_ID" />
        </Columns>
    </asp:DataGrid>

    <br /> <br /> <br /> <br />

    <asp:Repeater ID="rptSearch" runat="server" >
        <HeaderTemplate>
            <asp:Label ID="lblHeader" runat="server" Text="Your results are:" />
        </HeaderTemplate>

        <ItemTemplate>
            <br />
            <asp:Label ID="lblTitle" runat="server" Text='<%# Eval("Title") %>' />
            <asp:Label ID="lblAuthorFirst" runat="server" Text='<%# Eval("AuthorFirst") %>' />
            <asp:Label ID="lblAuthorLast" runat="server" Text='<%# Eval("AuthorLast") %>' />
            <asp:Label ID="DataPublished" runat="server" Text='<%# Eval("DatePublished") %>' />

            <asp:HyperLink ID="hypEdit" runat="server" Text="Edit" NavigateUrl='<%# Eval("EBook_ID", "EbookMgr.aspx?EBookID={0}") %>' />
        </ItemTemplate>
    </asp:Repeater>

    <br /> <br /> <br /> <br />

    <asp:Literal ID="litResults" runat="server" Text="" />

</asp:Content>
