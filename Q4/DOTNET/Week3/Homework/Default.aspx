<%@ Page Title="Redox - Home" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="Backend_Work._Default" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <div>
        
    </div>
</asp:Content>

<asp:Content ID="Content1" ContentPlaceHolderID="GamesContent" runat="server">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8"> <!-- This makes the search bar 2/3 of the screen width -->
                <div class="input-group">
                    <asp:TextBox ID="SearchTextBox" Columns="8" runat="server" CssClass="form-control" placeholder="Search..."></asp:TextBox>
                    <div class="input-group-append">
                        <asp:Button ID="SearchButton" runat="server" Text="Search" CssClass="btn btn-primary" OnClick="searchBtn_Click"></asp:Button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <asp:Literal ID="gameTilesContent" runat="server"></asp:Literal>
</asp:Content>




