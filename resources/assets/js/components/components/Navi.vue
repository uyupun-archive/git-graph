<template>
    <div class="nav">
        <div class="navContainer">
            <h1 class="title">
                <i class="fab fa-github"></i>
                <span>GitGraph</span>
            </h1>
            <a href="https://github.com/tyokinuhata/git-graph" target="_blank" class="link">GitHub</a>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .nav {
        background: #24292e;
        width: 100%;
        height: 55px;
    }

    .navContainer {
        max-width: 980px;
        width: 100%;
        margin: 0 auto;
    }

    .title {
        display: inline-block;
        margin-right: 30px;
        line-height: 55px;
        font-size: 33px;
        color: #fff;
    }

    .link {
        text-decoration: none;
        font-weight: 600;
        color: #fff;
    }
</style>